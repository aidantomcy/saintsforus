import { defineCollection, z } from "astro:content";

const saints = defineCollection({
  schema: z.object({
    title: z.string(),
    alias: z.string(),
    body: z.string(),
  }),
});

export const collections = { saints };
