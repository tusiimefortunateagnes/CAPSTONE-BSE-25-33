<template>
  <Head title="My Tasks" />
  <AuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <!-- mines -->
          <div class="border p-10">
            <h3 class="font-bold text-xl dark:text-white">My Tasks</h3>
            <div class="flex flex-col space-y-5">
              <div
                v-if="tasks.length > 0"
                class="grid sm:grid-cols-3 sm:gap-3 grid-cols-1 m-5"
              >
                <task-item
                  v-for="task in tasks"
                  :key="task.id"
                  :task="task"
                  @edit="editTask"
                  @delete="deleteTask"
                />
              </div>
              <div v-else class="bg-white p-10">
                <p
                  class="text-center font-bold text-md text-gray-500 dark:text-gray-400"
                >
                  No tasks found
                </p>
              </div>
              <!-- <task-manager :tasks="tasks" /> -->
            </div>
          </div>
          <!-- end -->
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
<script>
import TaskItem from "@/Components/TaskItem.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import TaskManager from "@/Components/TaskManager.vue";
export default {
  components: { TaskItem, Head, TaskManager },
  name: "MyTasks",
  props: ["tasks"],
  methods: {
    editTask(id) {
      this.$inertia.visit(route("editTask", id));
    },
    deleteTask(id) {
      console.log(route("deleteTask", id));

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.$inertia.delete(route("deleteTask", id), {
            onSuccess: () => {
              Swal.fire("Deleted!", "Your task has been deleted.", "success");
            },
            onError: (x) => {
              console.log(x);

              Swal.fire("Error!", "An error occurred", "error");
            },
          });
        } else {
          Swal.fire("Cancelled", "Your task is safe :)", "error");
        }
      });
    },
  },
};
</script>
<style lang="scss" scoped>
</style>