<template>
  <div class="border-[1px] border-gray-300 p-5 m-5">
    <div class="flex justify-between items-center">
      <h3 class="font-bold text-xl dark:text-white">{{ project.name }}</h3>
      <div class="flex space-x-2">
        <button
          @click="$emit('edit', project.id)"
          class="px-2 py-1 text-xs font-medium text-indigo-600 bg-indigo-100 rounded-md hover:bg-indigo-200"
        >
          Edit
        </button>
        <button
          @click="$emit('delete', project.id)"
          class="px-2 py-1 text-xs font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200"
        >
          Delete
        </button>
      </div>
    </div>
    <!-- <p class="text-sm text-gray-500 dark:text-gray-400">
      {{ project.description }}
    </p> -->
  </div>
</template>
<script lang="ts">
export default {
  name: "ProjectItem",
  props: ["project"],
  data() {
    return {};
  },
};
</script>
<style lang="scss">
</style>