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
    <NavItem text="About the Creator" href="https://aidantomcy.github.io" />
    <ThemeButton />
  </nav>
</div>
