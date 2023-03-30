<script lang="ts">
  export let text: string;
  export let href: string;
</script>

<a
  {href}
  class="text-xl font-normal md:inline-block p-8 rounded-lg text-gray-700 hover:text-black dark:hover:text-white dark:text-grey transition-all inline"
  >{text}</a
>
