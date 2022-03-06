const express = require('express');
const app= express();

app.use(express.json());
app.use(express.static("static"));
app.get("/", (req, res) => {
    res.json({ message: "Hello from server!" });
});

app.listen(3000, () => {
    console.log(`Server listening on Port 3000`);
  });