<template>
    <div :data-task-id="task.id" class="bg-white shadow rounded p-3 mb-3 border border-white w-full max-w-[300px]">
      <div class="flex flex-col justify-between">
        <a :href="task.url" class="text-blue-700 font-semibold font-sans tracking-wide text-sm mb-3">{{ task.title }}</a>
        <div class="flex flex-col gap-2">
          <p v-if="task.user" class="truncate text-xs"><i class="icon-user mr-2"></i>{{ task.assignee_name }}</p>
          <p v-if="task.due_date" class="text-xs"><i class="icon-calendar mr-2"></i>{{ task.formatted_due_date }}</p>
          <p v-if="task.estimate" class="text-xs"><i class="icon-clock-o mr-2"></i>{{ task.estimate_string }}</p>
        </div>
      </div>
    </div>
  </template>
  <script>
  import Badge from "./Badge.vue";
  export default {
    components: {
      Badge
    },
    props: {
      task: {
        type: Object,
        default: () => ({})
      }
    },
    computed: {
      badgeColor() {
        const mappings = {
          Design: "purple",
          "Feature Request": "teal",
          Backend: "blue",
          QA: "green",
          default: "teal"
        };
        return mappings[this.task.type] || mappings.default;
      }
    }
  };
  </script>
  