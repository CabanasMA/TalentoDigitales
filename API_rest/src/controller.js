import {pool} from "./database.js" ;

class PersonaController{
//larga todos los objetos
    async getAll(req, res) {
        try {
           const [result] = await pool.query(`SELECT * FROM biblioteca`);
            res.json(result);
        } catch (error) {
            res.status(500).json({ error: 'Ocurrió un error al obtener los datos. Intente nuevamente' });
        }
    }

//Permite elegir por id    
    async getOne(req, res) {
        try {
            const biblioteca= req.body;
            const id = parseInt(biblioteca.id);
            const [result] = await pool.query(`SELECT * FROM biblioteca WHERE id=(?)`,[biblioteca.id]);

            if (result[0] !== undefined) {
                res.json(result);
            } else {
                res.status(404).json({ "Error": '¡Ups! No se ha encontrado el libro con ese ID' });
            }
        } catch (error) {
            res.status(400).json({ error: error.message });
        }
    }

//Permite agregar a la base de datos
    async add(req, res) {
        try {
            const biblioteca = req.body;

            // Verificar si los campos están vacíos antes de insertar
            if (biblioteca.titulo.trim() === '' || biblioteca.autor.trim() === '' || libro.categoria.trim() === '') {
                throw new Error("Complete los campos correctamente");
            }

            // Insertar en la base de datos
            const [result] = await pool.query (`INSERT INTO biblioteca(titulo,autor,publicationyear,ISBN) VALUES(?,?,?,?)`,[biblioteca.titulo,biblioteca.autor,biblioteca.publicationyear,biblioteca.ISBN]);

            // Verificar si la inserción fue exitosa
            if (result.affectedRows === 1) {
                res.json({ "Id insertado": result.insertId });
            } else {
                throw new Error("No se pudo insertar el libro en la base de datos");
            }
        } catch (error) {
            res.status(500).json({ error: error.message });
        }
    }


//Permite borrar de la base de datos
    async delete(req, res) {
        try {
            const biblioteca = req.body;

            if (!biblioteca.ISBN) {
                throw new Error("El ISBN no ha sido completado. Intente nuevamente");
            }

            // Eliminar el libro de la base de datos
            const [result]= await pool.query (`DELETE FROM biblioteca WHERE id=(?)`,[biblioteca.id]);
            if (result.affectedRows > 0) {
                res.json({ "Registros eliminados": result.affectedRows });
            } else {
                res.status(404).json({ "Error": 'No se ha encontrado el libro o, el mismo no existe' });
            }
        } catch (error) {
            res.status(400).json({ error: error.message });
        }
    }

//Permite actualizar
    async update(req, res) {
        try {
            const biblioteca = req.body;
           const[result] = await pool.query(`UPDATE biblioteca SET id = (?), titulo = (?), autor = (?), publicationyear = (?), ISBN = (?)`,[biblioteca.id,biblioteca.titulo,biblioteca.autor,biblioteca.publicationyear,biblioteca.ISBN]);


            if (result.changedRows === 0 || biblioteca.id === 0 || biblioteca.id == "") {
                throw new Error('El libro que busca no fue encontrado');
            } else {
                res.json({"Registros actualizados": result.changedRows});
            }
        } catch (error) {
            res.status(404).json({ error: 'El ID no existe' });
        }
    }
}

export const bibliotecas = new PersonaController();