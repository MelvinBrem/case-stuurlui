# Stuurlui Case Theme

## Installation

Clone the content of the repo to the WordPress root:

```bash
git clone [the git url] tmp

rsync -a tmp/ ./ && rm -fr tmp/
```

Instal NPM dependencies and build:

```bash
npm install && npm run build
```

Install Composer dependencies:

```bash
composer install
```
