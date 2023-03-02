let mix = require("laravel-mix");

mix.styles(
    [
        "public/css/dashbroad.css",
        "public/css/Detail.css",
        "public/css/invester_page.css",
        "public/css/project_detail.css",
        "public/css/user_login_register.css",
        "public/css/user_post_page.css",
    ],
    "public/css/aftermix/all.css"
);

mix.js(
    [
        "public/js/confirm-delete.js",
        "public/js/search.js",
        "public/js/unit-attribute.js",
    ],
    "public/js/aftermix/all.js"
);
