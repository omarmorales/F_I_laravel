@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li><a href="{{ route('permissions.index') }}">Manage Permissions</a></li>
        <li class="is-active"><a href="#" aria-current="page">Create</a></li>
      </ul>
    </nav>

    <h1 class="title">Create Permission</h1>
    <form action="{{ route('permissions.store') }}" method="POST">
      {{ csrf_field() }}

      <div class="block">
            <b-radio v-model="permissionType" name="permission_type" native-value="basic">Basic Permission</b-radio>
            <b-radio v-model="permissionType" name="permission_type" native-value="crud">CRUD Permission</b-radio>
      </div>

      <div class="field" v-if="permissionType == 'basic'">
        <label for="display_name" class="label">Name (Display Name)</label>
        <p class="control">
          <input type="text" class="input" name="display_name">
        </p>
      </div>

      <div class="field" v-if="permissionType == 'basic'">
        <label for="name" class="label">Slug <small>(Cannot be changed)</small></label>
        <p class="control">
          <input type="text" class="input" name="name">
        </p>
      </div>

      <div class="field" v-if="permissionType == 'basic'">
        <label for="description" class="label">Description</label>
        <p class="control">
          <input type="text" class="input" name="description">
        </p>
      </div>

      <div class="field" v-if="permissionType == 'crud'">
        <label for="resource" class="label">Resource</label>
        <p class="control">
          <input type="text" class="input" name="resource" id="resource" v-model="resource" placeholder="The name of the resource">
        </p>
      </div>

      <div class="columns" v-if="permissionType == 'crud'">
        <div class="column is-one-quarter">
          <div class="field">
            <b-checkbox v-model="crudSelected" native-value="create">Create</b-checkbox>
          </div>
          <div class="field">
            <b-checkbox v-model="crudSelected" v-model="crudSelected" native-value="read">Read</b-checkbox>
          </div>
          <div class="field">
            <b-checkbox v-model="crudSelected" native-value="update">Update</b-checkbox>
          </div>
          <div class="field">
            <b-checkbox v-model="crudSelected" native-value="delete">Delete</b-checkbox>
          </div>
        </div>

        <input type="hidden" name="crud_selected" :value="crudSelected">

        <div class="column">
          <table class="table" v-if="resource.length >= 3 && crudSelected.length > 0">
            <thead>
              <th>Name</th>
              <th>Slug</th>
              <th>Description</th>
            </thead>
            <tbody>
              <tr v-for="item in crudSelected">
                <td v-text="crudName(item)"></td>
                <td v-text="crudSlug(item)"></td>
                <td v-text="crudDescription(item)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button class="button is-link">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection
