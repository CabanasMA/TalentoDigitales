import {pool} from "./database.js";

class PersonaController{

    async getAll(reg, res){
        const result = await pool.query(`SELECT * FROM biblioteca`);
        res.json(result);
    }
}

export const biblioteca = new PersonaController();