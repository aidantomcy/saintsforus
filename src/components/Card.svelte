<script lang="ts">
  export let title: string;
  export let image: string;
  export let href: string;
</script>

<a
  class="my-6 bg-gray-200 p-4 rounded-xl grid place-items-center select-none md:h-80 md:w-52 hover:-translate-y-1 hover:cursor-pointer hover:shadow-lg hover:duration-100 dark:bg-dark-secondary dark:text-white mx-2 w-11/12"
  {href}
>
  <img
    src={image}
    alt=""
    class="rounded-2xl object-cover w-40 h-52"
  />
  <div class="text-center py-2">{title}</div>
</a>
