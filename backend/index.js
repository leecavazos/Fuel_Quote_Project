const express = require('express');
const app= express();
const cors = require('cors');
const Pricing_mod = require('./classes/PricingModule');

app.use(express.json({ limit: '1mb'}));
app.use(express.static("public"));
app.use(cors());
app.use('/', require('./routes/index'));

//----POST REQUEST  for Registration Form ----//
app.post('/api/Registration', (req, res) => {
    console.log('I got a Request')
    const info = req.body;
    console.log(info);
    res.json({
        status: 'success'
    });
    return info
});

app.post('/api/FuelQuote', (req, res) => {
    console.log('I got a Request')
    const info = req.body;
    console.log(info);
    res.json({
        status: 'success'
    });
    return  info;
});

app.listen(5000, () => {
    console.log(`Server listening on Port 5000`);
});