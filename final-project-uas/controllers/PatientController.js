// import Model Patient


const Patient = require("../models/Patient");


// buat class PatientController
class PatientController {
    // buat fungsi
    async index(req, res) {
      const patients = await Patient.all();
  
      if (patients.length > 0) {
        const data = {
          message: "Menampilkkan semua patients",
          data: patients,
        };
  
        return res.status(200).json(data);
      } else {
        const data = {
          message: "Patients is empty"
        };
  
        return res.status(200).json(data);
      }
    }
  
    async store(req, res) {
      const { name, phone, address, status, in_date_at, out_date_at  } = req.body;
  
      if (!name || !phone || !address || !status || !in_date_at || !out_date_at) {
        const data = {
          message: "Semua data harus dikirim"
        };
  
        return res.status(422).json(data);
      } else {
        const patient = await Patient.create(req.body);
        const data = {
          message: "Menambahkan data patient",
          data: patient,
        };
  
        res.status(201).json(data);
      }
    }
  
    async update(req, res) {
      const { id } = req.params;
      const patient = await Patient.find(id);
  
      if(patient) {
        const patient = await Patient.update(id, req.body);
        const data = {
          message: "Mengedit data student",
          data: patient
        };
  
        res.status(200).json(data);
      } else {
        const data = {
          message: "Student not found",
        };
  
        res.status(404).json(data);
      }
    }
  
    async destroy(req, res) {
      const { id } = req.params;
      const patient = await Patient.find(id);
  
      if (patient) {
        await Patient.delete(id);
        const data = {
          message: "Menghapus data patient",
          data: patient
        };
  
        res.status(200).json(data);
      } else {
        const data = {
          message: "Patient not found"
        };
  
        res.status(404).json(data);
      }
    }
  
    async show(req, res) {
      const { id } = req.params;
      const patient = await Patient.find(id);
  
      if (patient) {
        const data = {
          message: `Menampilkan detail patients`,
          data: patient
        };
  
        res.status(200).json(data);
      } else {
        const data = {
          message: "Patient not found"
        };
  
        res.status(404).json(data);
      }
    }
    async search(req, res) {
    const { name } = req.params;
      const patient = await Patient.search(name);
      
      if(patient) {
        
        const data= {
          message: 'Patients Get search resource',
          data: patient
        };
        res.status(200).json(data);
      } else {
        const data = {
          message: " Data Patient not found"
        };
  
        res.status(404).json(data);
      }
    }
    async positive(req,res) {
      const positive  = req.body.status;
      const patient = await Patient.findByStatus(positive);
      
      if (patient) {
        
        const data= {
          message: ' Get positive resource',
          data: patient
        };
        res.status(200).json(data);
      } 
    }
    async recovered(req,res) {
      const  recovered  = req.body.status;
      const patient = await Patient.findByStatus(recovered);
                      

      if (patient) {
       
        const data= {
          message: ' Get recovered resource',
          data: patient
        };
        res.status(200).json(data);
      } 
    }
    async dead(req,res) {
      const dead = req.body.status;
      const patient = await Patient.findByStatus(dead);
                      

      if (patient) {
       
        const data= {
          message: ' Get dead resource',
          data: patient
        };
        res.status(200).json(data);
      } 
    }

  }
  
  
  
  // membuat object PatientController
  const object = new PatientController();
  
  // export object PatientController
  module.exports = object;