# CSH Smart Room Unified API

![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg)
[![License:MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

## Overview
This API will act as the unified front for all aspects of CSH's Smart Room display at Imagine RIT. The various elements and their respective functionality will be detailed here.

## Connections

### [Smart Shades](https://github.com/axg4975/smart-window-shades)

| URL | Method | Description | URL Params | Body Params | Response |
| --- | ------ | ----------- | ---------- | ----------- | -------- |
| /shades/ | GET | Get status of the shades | N/A | N/A | {"data":"45","status":200} |
| /shades/ | POST | Move shades to desired height | N/A | howOpen: number between 0 and 100, with 0 being fully closed | {"status":200} |
