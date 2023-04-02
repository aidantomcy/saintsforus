<script lang="ts">
  export let text: string;
  export let href: string;
</script>

<a
  class="text-xl font-normal hover:underline hover:decoration-sky-500 hover:decoration-wavy p-8"
  {href}
>
  {text}
</a>
