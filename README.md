# Lean IT — block theme

Hand-built WordPress block theme. No page builder, no jQuery, no web fonts, no plugins required.

## Structure
```
style.css        theme header + the few styles theme.json can't express
theme.json       colors, type scale, spacing, layout widths (the design system)
functions.php    strips WP front-end bloat + basic hardening
parts/           header.html, footer.html
templates/       front-page, page, single, index, 404
```

## Install
1. Deployed via cPanel Git Version Control from GitHub (see below), or zip this folder.
2. WP Admin → Appearance → Themes → Add New → Upload Theme → Activate.
3. Settings → Reading → "Your homepage displays" → leave as latest posts *or* a static page;
   `front-page.html` is used for the homepage either way.
4. Appearance → Editor → Navigation: add Services / About / Contact.

## Editing workflow
Edit files locally, commit to Git, re-upload (or deploy via SFTP/Git on Namecheap).
Changes made in the Site Editor are saved to the database and **override** the files.
To keep the files as the source of truth, avoid saving template edits in the Site Editor,
or use Appearance → Editor → Templates → "Clear customizations" after pulling new files.

## Placeholders to replace
- `parts/footer.html`: city and email
- `templates/front-page.html`: headline, services copy
