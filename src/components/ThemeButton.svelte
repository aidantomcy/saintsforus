<script lang="ts">
  import { themeStore } from "./stores/themeStore";
  import { get } from "svelte/store";
  import { onDestroy, onMount } from "svelte";
  import setTheme from "./utils/setTheme";
  import Sun from "./_icons/Sun.svelte";
  import Moon from "./_icons/Moon.svelte";

  onMount(() => {
    if (
      localStorage.theme === "dark" ||
      (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
      setTheme("dark");
    } else if (localStorage.theme === "light") {
      setTheme("light");
    }
  });

  const toggle = () => {
    if (get(themeStore) === "dark") {
      setTheme("light");
    } else if (get(themeStore) === "light") {
      setTheme("dark");
    }
  };

  let theme: Themes;
  const unsubscribe = themeStore.subscribe((val) => (theme = val));

  onDestroy(unsubscribe);
</script>

<button
  aria-label="Toggle Dark Mode"
  type="button"
  class="w-9 h-9 bg-gray-300 rounded-lg dark:bg-[#3d3d3d] flex items-center justify-center hover:ring-1 dark:ring-gray-300 transition-all ring-dark-secondary"
  on:click={toggle}
>
  {#if theme === "dark"}
    <Sun />
  {:else if theme === "light"}
    <Moon />
  {/if}
</button>
