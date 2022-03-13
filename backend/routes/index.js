const express = require('express');
router = express.Router();
index = require("../controllers/index");

console.log("About to call controllers\n");

router.get('/', index.index);

module.exports = router;