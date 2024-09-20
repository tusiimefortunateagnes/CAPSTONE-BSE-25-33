<template>
  <Head title="Projects" />
  <authenticated-layout>
    <!-- <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-white leading-tight"
      >
        Projects
      </h2>
    </template> -->
    <!-- content -->
    <div class="m-10">
      <div v-if="projects.length > 0" class="flex flex-col space-y-2">
        <project-item
          v-for="project in projects"
          :key="project.id"
          :project="project"
          @edit="editProject"
          @delete="deleteProject"
        />
      </div>
      <!-- if empty -->
      <div v-else class="bg-white shadow-sm p-10">
        <p
          class="text-center font-bold text-md text-gray-500 dark:text-gray-400"
        >
          No projects found
        </p>
      </div>
    </div>
  </authenticated-layout>
</template>
<script>
export default {
  name: "Projects",
  // props: ["projects"],
  data() {
    return {
      projects: [],
    };
  },
};
</script>
<style lang="css" scoped>
</style>