// import PatientController
const PatientController = require("../controllers/PatientController");

// import express
const express = require("express");

// membuat object router
const router = express.Router();

/**
 * Membuat routing
 */
router.get("/", (req, res) => {
  res.send("Hello Covid API Express");
});
// Membuat routing patient
//method get
router.get("/patients", PatientController.index);
//method post
router.post("/patients", PatientController.store);
//method put
router.put("/patients/:id", PatientController.update);
//method delete
router.delete("/patients/:id", PatientController.destroy);
//method show
router.get("/patients/:id", PatientController.show);
//method search
router.get("/patients/search/:name", PatientController.search);
// Get Positive Resource
router.get('/patients/status/positive', PatientController.positive);

// Get Recovered Resource
router.get('/patients/status/recovered', PatientController.recovered);

// Get Dead Resource
router.get('/patients/status/dead', PatientController.dead);



// export router
module.exports = router;