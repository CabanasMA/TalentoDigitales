import { Router } from "express";
import { biblioteca } from "./controller.js";

export const router = Router()

router.get('/biblioteca', biblioteca.getAll);
