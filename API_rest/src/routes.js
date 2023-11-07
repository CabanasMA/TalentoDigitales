import { Router } from "express";
import { bibliotecas } from "./controller.js";

export const router = Router()

router.get('/biblioteca', bibliotecas.getAll);
