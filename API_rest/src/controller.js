import {pool} from "./database.js" ;

class PersonaController{

    async getAll(req, res){
        const [result] = await pool.query(`SELECT * FROM biblioteca`);
        res.json(result);
    }

    async get(req, res){
        const [result] = await pool.query(`SELECT * FROM biblioteca WHERE id=(?)`,[biblioteca.id]);
        res.json("El id es del registro", result);
    }

    async add(req,res){
        const biblioteca = req.body;
        const [result] = await pool.query (`INSERT INTO biblioteca(titulo,autor,fecha,ISBN) VALUES(?,?,?,?)`,[biblioteca.titulo,biblioteca.autor,biblioteca.fecha,biblioteca.ISBN]);
        res.json({"Id insertado": result.insertId});
    }

    async delete(req,res){
        const biblioteca = req.body;
        const [result]= await pool.query (`DELETE FROM biblioteca WHERE id=(?)`,[biblioteca.id]);
        res.json({"Registros eliminados": result.affectedRows});

    }

    async update(req,res){
        const biblioteca = req.body;
        const[result] = await pool.query(`UPDATE biblioteca SET id = (?), titulo = (?), autor = (?), fecha = (?), ISBN = (?)`,[biblioteca.id,biblioteca.titulo,biblioteca.autor,biblioteca.fecha,biblioteca.ISBN]);
        res.json({" Registros actualizados": result.changedRows});
    }
}

export const bibliotecas = new PersonaController();