<template>
  <div class="w-full max-w-md mx-auto">
    <label
      for="task"
      class="block mb-2 text-md font-medium text-gray-700 dark:text-gray-200"
    >
      {{ label }}
    </label>
    <input
      v-if="type == 'date'"
      type="date"
      @input="$emit('update:modelValue', $event.target.value)"
      :class="`w-full ${errorClass} px-4 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 transition-shadow duration-200 ease-in-out resize-y my-5`"
      :value="modelValue"
      id=""
    />
    <select
      v-if="type == 'dropdown'"
      @input="$emit('update:modelValue', $event.target.value)"
      :class="`w-full ${errorClass} px-4 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 transition-shadow duration-200 ease-in-out resize-y my-5`"
    >
      <option value="">Select your status</option>
      <option value="0">Backlog</option>
      <option value="1">Under execution</option>
      <option value="2">Completed</option>
    </select>
    <textarea
      v-if="type == 'text'"
      id="task"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      :class="`w-full ${errorClass} px-4 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 transition-shadow duration-200 ease-in-out resize-y min-h-[100px]`"
      placeholder="Add a new task"
    ></textarea>
    <label v-text="errorText" class="text-red-500"></label>
  </div>
</template>

<script>
export default {
  name: "TaskInput",
  props: {
    type: {
      type: String,
      default: "text",
    },
    errorText: {
      type: String,
      default: "",
    },
    errorClass: {
      type: String,
      default: "",
    },
    label: String,
    modelValue: {
      type: String,
      default: "",
    },
  },
  emits: ["update:modelValue"],
};
</script>