<script>
name: 'UserPage'
export default {
  props: {
    name: String,
    email: String
  },
  setup() {
    const headers = ['Nome', 'E-mail']
    return { headers }
  }
}
</script>

<template>
<div id="container">
  <h1>
    Confira alguns dados sobre o Usuário: <span> {{ name }} </span> 
  </h1>
  <table>
    <thead>
      <tr align="left">
        <th v-for="header in headers">
        {{ header }}
       </th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td>
            {{ name }}
          </td>
          <td>
            {{ email }}
          </td>
        </tr>
      </tbody>
  </table>
</div>

</template>

<style>
#container {
  width: 100%;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
</style>