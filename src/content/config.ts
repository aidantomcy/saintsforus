import { defineCollection, z } from "astro:content";

const saints = defineCollection({
  schema: z.object({
    title: z.string(),
    lifetime: z.string(),
  }),
});

export const collections = { saints };
