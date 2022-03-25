<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Nunito', sans-serif;
    }
    </style>
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="container">
                <h2>Forms</h2>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Enter your name" class="form-control" required
                        v-model="newItem.name">
                    <br>
                    <label for="name">Age</label>
                    <input type="text" name="age" placeholder="Enter your age" class="form-control" required
                        v-model="newItem.age">
                    <br>
                    <label for="name">Profession</label>
                    <input type="text" name="profession" placeholder="Enter your profession" class="form-control"
                        required v-model="newItem.profession">
                    <br>
                    <button class="btn btn-primary" @click.prevent="createItem()">Add</button>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Professions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in items">
                                <td>@{{ item.id }}</td>
                                <td>@{{ item.name }}</td>
                                <td>@{{ item.age }}</td>
                                <td>@{{ item.profession }}</td>
                                <td data-toggle="modal"
                                    @click="showModal=true; setVal(item.id, item.name, item.age, item.profession)"
                                    class="btn btn-info">
                                    Edit
                                </td>
                                <td @click=" deleteItem(item)" class="btn btn-danger">
                                    Delete
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <modal v-if="showModal" @close="showModal=false">
                        <h3 slot="header">Edit Item</h3>
                        <div slot="body">

                            <input type="hidden" disabled class="form-control" id="e_id" name="id" required
                                :value="this.e_id">
                            Name: <input type="text" class="form-control" id="e_name" name="name" required
                                :value="this.e_name">
                            Age: <input type="text" class="form-control" id="e_age" name="age" required
                                :value="this.e_age">
                            Profession: <input type="text" class="form-control" id="e_profession" name="profession"
                                required :value="this.e_profession">


                        </div>
                        <div slot="footer">
                            <button class="btn btn-default" @click="showModal = false">
                                Cancel
                            </button>

                            <button class="btn btn-info" @click="editItem()">
                                Update
                            </button>
                        </div>
                    </modal>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/x-template" id="modal-template">
        <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  default header
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                    
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  
                  
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </script>
</body>

</html>