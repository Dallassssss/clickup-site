#!/usr/bin/env node
/*
  Generate sitemap.xml by scanning the public directory for .html files.
  Usage: node tools/generate-sitemap.js [rootDir] [siteOrigin]
  Defaults:
    rootDir: public_html (if exists) else project root
    siteOrigin: https://clickup.by
*/
const fs = require('fs');
const path = require('path');

function readCNAME(projectRoot){
  try{
    const cnamePath = path.join(projectRoot, 'CNAME');
    if(fs.existsSync(cnamePath)){
      const domain = fs.readFileSync(cnamePath,'utf8').trim();
      if(domain) return 'https://' + domain.replace(/\/$/,'');
    }
  }catch(_e){}
  return null;
}

function walk(dir, ignoreDirs = new Set(['node_modules', '.git', '.cache', '.next'])){
  const out = [];
  for(const entry of fs.readdirSync(dir, { withFileTypes: true })){
    if(entry.name.startsWith('.')) continue;
    const abs = path.join(dir, entry.name);
    if(entry.isDirectory()){
      if(ignoreDirs.has(entry.name)) continue;
      out.push(...walk(abs, ignoreDirs));
    } else if(entry.isFile()){
      out.push(abs);
    }
  }
  return out;
}

function toPosix(p){ return p.split(path.sep).join('/'); }

function main(){
  const projectRoot = process.cwd();
  const rootDirArg = process.argv[2];
  const originArg = process.argv[3];
  const publicDir = rootDirArg ? path.resolve(projectRoot, rootDirArg) : path.resolve(projectRoot, 'public_html');
  const siteOrigin = originArg || readCNAME(projectRoot) || 'https://clickup.by';

  if(!fs.existsSync(publicDir)){
    console.error('Directory not found:', publicDir);
    process.exit(1);
  }

  const files = walk(publicDir);
  const htmlFiles = files.filter(f => f.toLowerCase().endsWith('.html'));

  const urls = new Map();
  for(const abs of htmlFiles){
    const rel = path.relative(publicDir, abs);
    let urlPath = '/' + toPosix(rel);
    // Normalize index.html to directory URL
    if(/(^|\/)index\.html$/i.test(rel)){
      urlPath = '/' + toPosix(path.dirname(rel)).replace(/^\.$/, '');
      if(!urlPath.endsWith('/')) urlPath += '/';
      if(urlPath === '//') urlPath = '/';
    }
    const stat = fs.statSync(abs);
    urls.set(urlPath, stat.mtime);
  }

  // Always ensure root page exists
  if(!urls.has('/')) urls.set('/', new Date());

  const sitemapPath = path.resolve(projectRoot, 'sitemap.xml');
  const lines = [];
  lines.push('<?xml version="1.0" encoding="UTF-8"?>');
  lines.push('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">');
  for(const [urlPath, mtime] of Array.from(urls.entries()).sort((a,b)=>String(a[0]).localeCompare(String(b[0])))){
    const loc = siteOrigin.replace(/\/$/,'') + urlPath;
    const lastmod = new Date(mtime).toISOString();
    const priority = urlPath === '/' ? '1.0' : urlPath.split('/').filter(Boolean).length <= 1 ? '0.9' : '0.8';
    lines.push('  <url>');
    lines.push(`    <loc>${loc}</loc>`);
    lines.push(`    <lastmod>${lastmod}</lastmod>`);
    lines.push('    <changefreq>weekly</changefreq>');
    lines.push(`    <priority>${priority}</priority>`);
    lines.push('  </url>');
  }
  lines.push('</urlset>');

  fs.writeFileSync(sitemapPath, lines.join('\n'));
  console.log('Sitemap written:', sitemapPath, `(${urls.size} urls)`);

  // Ensure robots.txt references the sitemap
  const robotsPath = path.resolve(projectRoot, 'robots.txt');
  let robots = 'User-agent: *\nAllow: /\n\n';
  robots += `Sitemap: ${siteOrigin.replace(/\/$/,'')}/sitemap.xml\n`;
  fs.writeFileSync(robotsPath, robots);
  console.log('Robots updated:', robotsPath);
}

main();


