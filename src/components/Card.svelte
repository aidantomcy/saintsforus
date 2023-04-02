<script lang="ts">
  export let title: string;
  export let image: string;
  export let href: string;
</script>

<a
  class="my-6 bg-gray-200 p-4 rounded-xl grid place-items-center select-none h-80 w-52 mx-40 hover:-translate-y-1 hover:cursor-pointer hover:shadow-lg hover:duration-150 dark:bg-dark-secondary dark:text-white"
  {href}
>
  <img
    src={image}
    alt=""
    class="rounded-2xl w-40 h-52 object-cover"
    loading="lazy"
  />
  <div class="text-center py-2">{title}</div>
</a>
