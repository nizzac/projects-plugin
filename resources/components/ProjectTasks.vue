<template>
    <div class="flex h-full">
        <div class="w-full h-full h-[800px] flex gap-3 overflow-x-auto overflow-y-hidden pb-12 ">
            <div v-for="(column, key) in state.tasks" class="bg-gray-100 py-3 min-w-[300px] overflow-y-hidden">
              <h3 class="mx-3 font-bold mb-3">{{ column.name }}</h3>
              <draggable
                class="px-3 h-full overflow-y-auto"
                :data-status="column.status"
                :list="column.tasks"
                group="tasks"
                @end="onEnd"
                itemKey="id">
                <template #item="{element, index}">
                  <TaskCard :task="element" />
                </template>
              </draggable>
            </div>
        </div>
    </div>
</template>

<script setup>

import { onMounted, reactive } from 'vue';
import draggable from 'vuedraggable'

const props = defineProps(['projectId'])

const state = reactive({
  tasks: {}
})

onMounted(() => {
  getTasks()
})

function getTasks() {
  window.oc.ajax('onGetTasks', {
    data: {
      project: props.projectId
    },
    success(data) {
      state.tasks = data
    }
  })
}

function onEnd(event) {
  window.oc.ajax('onUpdateTaskStatus', {
    data: {
      task: event.item.dataset.taskId,
      status: event.to.dataset.status
    }
  })
}
</script>