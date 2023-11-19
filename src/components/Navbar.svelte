<script lang="ts">
  import NavItem from "./NavItem.svelte";
  import ThemeButton from "./ThemeButton.svelte";
</script>

<div class="w-full flex justify-center mt-4">
  <nav
    class="bg-gray-200 rounded-xl flex justify-center items-center dark:bg-dark-secondary w-11/12 md:w-3/4 lg:w-1/2"
  >
    <NavItem text="Home" href="/" />
    <NavItem text="Contact" href="/contact" />
    <a href="https://aidantomcy.github.io" target="_blank" class="font-normal hover:underline hover:decoration-sky-500 hover:decoration-wavy px-2 md:text-xl md:px-4">About the Creator</a>
    <ThemeButton />
  </nav>
</div>
