<template>
  <ais-index app-id="9SLSAP8FPB" api-key="c26bdb11dc8039c7ae8fd33fea061163" index-name="users">
    <ais-input placeholder="Search articles..."></ais-input>

    <ais-results>
      <template slot-scope="{ result}">
        <div>
          <h2>{{ result.name}}</h2>
          <h4>{{ result.email}}</h4>
        </div>
      </template>
    </ais-results>
  </ais-index>
</template>

<script>
export default {};
</script>

<style>
</style>