<template>
  <div
    class="bg-white dark:bg-gray-800 border-[0.5px] shadow-sm border-gray-200 rounded-lg p-4 mb-2 flex items-center justify-between"
  >
    <div class="flex items-center space-x-4">
      <div
        :class="[
          'w-5 h-5 rounded-full',
          task.status === '2'
            ? 'bg-green-500'
            : task.status === '1'
            ? 'bg-yellow-500'
            : 'bg-red-500',
        ]"
      ></div>
      <div>
        <!-- <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
          {{ task.title }}
        </h3> -->
        <p class="text-sm text-black dark:text-gray-300">
          {{ task.task_description }}
        </p>
      </div>
    </div>
    <div class="flex items-center space-x-2">
      <button
        @click="$emit('edit', task.id)"
        class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
          />
        </svg>
      </button>
      <button
        @click="$emit('delete', task.id)"
        class="text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
            clip-rule="evenodd"
          />
        </svg>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "TaskItem",
  props: {
    task: {
      type: Object,
      // required: true,
      // validator: (task) => {
      //   return task.id && task.title && task.description && task.status;
      // },
    },
  },
  emits: ["edit", "delete"],
};
</script>