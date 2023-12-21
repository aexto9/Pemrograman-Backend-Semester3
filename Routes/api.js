//Import Student Controller
const StudentController = require("../controller/StudentController")

// Import express
const express = require("express");

//membuat object router
const router = express.Router();

/**
 * membuat routing
 * Method get menerima 2 params
 * Param 1 adalah endpoint
 * Param 2 Callback
 * Callback menerima object req dan res
 */

router.get("/", (req, res) => {
    res.send("Hello Express!");
});

//Routing Students
router.get("/students", StudentController.index);
router.post("/students", StudentController.store);
router.put("/students", StudentController.update);
router.delete("/students", StudentController.destroy);

// Export Router
module.exports = router;