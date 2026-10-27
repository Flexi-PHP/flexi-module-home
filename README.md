# Home Module

The Home module provides the `/` route and renders the bundled home template through `TemplateEngineInterface` from the optional UI module.

The module registers its route, query, and handler configuration in `Config/routes.json`, `Config/queries.json`, and `Config/services.json`. It requires the UI module for template rendering.

Install `flexi/flexi-module-home` and activate `Home` with its dependencies. It supports PHP 7.4+, Flexi Core `^3.2`, and `flexi/contracts` `^5.2.1`.
