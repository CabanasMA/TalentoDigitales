import {pool} from "./database.js" ;

class PersonaController{

    async getAll(req, res){
        const [result] = await pool.query(`SELECT * FROM biblioteca`);
        res.json(result);
    }
}

export const bibliotecas = new PersonaController();