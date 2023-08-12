<script lang="ts">
  export let text: string;
  export let href: string;
</script>

<a
  class="font-normal hover:underline hover:decoration-sky-500 hover:decoration-wavy px-2 md:text-xl md:px-4"
  {href}
>
  {text}
</a>
