const app = Vue.createApp({
  data() {
      return {
          apiUrl: 'api.php',
          todoList: [],
          newTask: "",
      };
  },
  methods: {
      readList() {
          axios.get(this.apiUrl)
              .then(response => {
                  this.todoList = response.data;
              })
              .catch(error => {
                  console.error(error);
              });
      },
      addTask() {
          if (this.newTask.trim() === "") {
              console.log("Il nuovo task è vuoto o composto solo da spazi bianchi.");
              return;
          }

          const data = new FormData();
          data.append("task", this.newTask);

          axios.post(this.apiUrl, data, {
                  headers: { "Content-Type": "multipart/form-data" },
              })
              .then(response => {
                  this.todoList = response.data;
                  this.newTask = ""; // Resetta l'input dopo l'aggiunta della task
              })
              .catch(error => {
                  console.error(error);
              });
      },
      toggleTask(index) {
          const data = new FormData();
          data.append("toggle", index);

          axios.post(this.apiUrl, data, {
                  headers: { "Content-Type": "multipart/form-data" },
              })
              .then(response => {
                  this.todoList = response.data;
              })
              .catch(error => {
                  console.error(error);
              });
      },
      deleteTask(index) {
          const data = new FormData();
          data.append("delete", index);

          axios.post(this.apiUrl, data, {
                  headers: { "Content-Type": "multipart/form-data" },
              })
              .then(response => {
                  this.todoList = response.data;
              })
              .catch(error => {
                  console.error(error);
              });
      },
  },
  mounted() {
      this.readList();
  },
});

app.mount("#app");
