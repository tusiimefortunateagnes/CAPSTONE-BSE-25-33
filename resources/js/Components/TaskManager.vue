<template>
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl dark:text-white font-bold mb-6">My Tasks</h1>
    <div class="mb-4 w-full">
      <div class="border-b border-gray-200">
        <nav class="-mb-px mx-5 flex" aria-label="Tabs">
          <button
            v-for="(tab, index) in tabs"
            :key="index"
            @click="setCurrentTab(tab.status)"
            :class="[
              activeTab === tab.status
                ? 'border-orange-500 text-orange-600'
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
              'whitespace-nowrap py-4 px-10 border-b-2 font-medium text-sm',
            ]"
          >
            {{ tab.name }}
          </button>
        </nav>
      </div>
    </div>
    <div class="mt-6">
      <ul class="divide-y divide-gray-200">
        <li
          v-for="(task, index) in currentTasks"
          :key="index"
          class="py-4 flex items-center justify-between"
        >
          <div class="text-sm font-medium text-gray-900 dark:text-white">
            {{ task.task_description }}
          </div>

          <div>
            <button
              v-if="activeTab !== 0"
              @click="moveTask(task, activeTab, 0)"
              class="ml-2 px-2 py-1 text-xs font-medium text-indigo-600 bg-indigo-100 rounded-md hover:bg-indigo-200"
            >
              Move to Backlog
            </button>
            <button
              v-if="activeTab !== 1"
              @click="moveTask(task, activeTab, 1)"
              class="ml-2 px-2 py-1 text-xs font-medium text-yellow-600 bg-yellow-100 rounded-md hover:bg-yellow-200"
            >
              Move to Execution
            </button>
            <button
              v-if="activeTab !== 2"
              @click="moveTask(task, activeTab, 2)"
              class="ml-2 px-2 py-2 text-xs font-medium text-green-600 bg-green-100 rounded-md hover:bg-green-200"
            >
              Move to Completed
            </button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
// import { ref } from "vue";

export default {
  props: {
    tasks: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      activeTab: 0,
      tabs: [
        {
          name: "Pending",
          status: 0,
        },
        {
          name: "Under Execution",
          status: 1,
        },
        {
          name: "Completed",
          status: 2,
        },
      ],
      currentTasks: [],
    };
  },
  mounted() {
    this.currentTasks = this.$props.tasks.filter(
      (task) => parseInt(task.status) === this.activeTab
    );
  },
  methods: {
    setCurrentTab(id) {
      this.activeTab = id;
      console.log(this.activeTab);
      this.currentTasks = this.$props.tasks.filter(
        (task) => parseInt(task.status) === this.activeTab
      );
    },
    moveTask(task, fromTab, toTab) {
      console.log(task, fromTab, toTab);
      // this.tasks[fromTab] = this.tasks[fromTab].filter(
      //   (t) => parseInt(t.id) !== task.id
      // );
      // this.tasks[toTab].push(task);
    },
  },
};
</script>