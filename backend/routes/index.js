const express = require('express');
router = express.Router();
index = require("../controllers/index");

router.get('/', index.index);

module.exports = router;