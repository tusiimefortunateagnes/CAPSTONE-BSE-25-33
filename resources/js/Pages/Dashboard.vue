<template>
  <Head title="Home" />

  <AuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <!-- title -->
            <h3 class="font-bold text-xl">Add your task</h3>
            <!-- generate a form for add tasks -->
            <form
              class="w-full flex flex-col justify-center place-items-center items-center"
              @submit.prevent="addTask"
            >
              <!-- Task Date -->

              <form-element
                type="date"
                v-model="form.date"
                label="Date"
                @update:modelValue="form.date"
                :errorClass="form.errors.date ? 'border-red-600' : ''"
                :errorText="form.errors.date"
              />

              <!-- task description -->
              <form-element
                label="Description"
                v-model="form.task_description"
                @update:modelValue="form.task_description"
                :errorClass="
                  form.errors.task_description ? 'border-red-600' : ''
                "
                :errorText="form.errors.task_description"
              />
              <!-- status -->
              <form-element
                label="Status"
                v-model="form.status"
                @update:modelValue="form.status"
                :errorClass="form.errors.status ? 'border-red-600' : ''"
                :errorText="form.errors.status"
                type="dropdown"
              />
              <div
                class="w-full my-5 flex flex-col justify-center place-content-center items-center"
              >
                <button
                  :disabled="loading"
                  type="submit"
                  :class="`px-4 py-2 w-[29em] bg-orange-600 font-bold  text-white rounded-md hover:bg-orange-600 focus:outline-none`"
                >
                  <span v-if="loading" class="spinner-border spinner-border-sm"
                    >Processing.....</span
                  >
                  <span v-else>Add Task</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import { Head, useForm } from "@inertiajs/vue3";
import FormElement from "@/Components/FormElement.vue";
import Swal from "sweetalert2";
export default {
  components: {
    Head,
    FormElement,
  },
  data() {
    return {
      form: useForm({
        date: "",
        task_description: "",
        status: "",
      }),
      loading: false,
    };
  },
  methods: {
    addTask() {
      // Add your logic here
      this.form.post(route("addTask"), {
        preserveScroll: true,
        onProgress: () => {
          this.loading = true;
        },
        onSuccess: (x) => {
          this.loading = false;
          Swal.fire({
            title: "Success",
            icon: "success",
            timer: 3000,
            timerProgressBar: true,
            text: "Task Recorded successfully",
          });
          this.form.reset();
        },
        onError: (error) => {
          console.log(error.error);
        },
      });
    },
    // captureData(data) {
    //   console.log(data);
    // },
  },
};
</script>