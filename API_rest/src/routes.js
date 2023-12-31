import { Router } from "express";
import { bibliotecas } from "./controller.js";

export const router = Router()

router.get('/biblioteca', bibliotecas.getAll);

router.post('/biblioteca',bibliotecas.add);

router.delete('/biblioteca',bibliotecas.delete);

router.put('/biblioteca', bibliotecas.update);