<!DOCTYPE html>

<html>
  <head>
    <title>HXL code "{$code->code|escape}" ({$code->name|escape})</title>
    <link rel="stylesheet" href="/style/default.css" />
  </head>
  <body>
{include file="fragments/header.tpl"}
    <nav class="breadcrumbs">
      <li><a href="/">Home</a></li>
      <li><a href="/code">HXL codes</a></li>
    </nav>

    <main>
      <h1>HXL code &ldquo;{$code->code|escape}&rdquo; ({$code->name|escape})</h1>

      <form method="GET" action="/search">
        <input type="hidden" name="code" value="{$code->code|escape}" />
        <label>
          <span>Search within &ldquo;{$code->code|escape}&rdquo;</span>
          <input name="q" placeholder="Search text" />
        </label>
        <input type="submit" />
      </form>

      <section id="datasets">
        <h2>Datasets</h2>

        {if $dataset_count > 0}
        <p>{$dataset_count|escape} dataset(s) use the HXL code &ldquo;{$code->code|escape}&rdquo;:</p>

        <table>
          <thead>
            <tr>
              <th>Dataset</th>
              <th>Source</th>
              <th>Latest copy</th>
              <th>Imported by</th>
            </tr>
          </thead>
          <tbody>
            {foreach item=import from=$imports}
            <tr>
              <td><a href="{$import|dataset_link}">{$import->dataset_name|escape}</a></td>
              <td><a href="{$import|source_link}">{$import->source_name|escape}</a></td>
              <td><a href="{$import|import_link}">{$import->stamp|escape}</a></td>
              <td><a href="{$import|user_link}">{$import->usr_name|escape}</a></td>
            </tr>
            {/foreach}      
          </tbody>
        </table>
        {else}
        <p>No datasets use the HXL code &ldquo;{$code->code|escape}&rdquo; yet.</p>
        {/if}

      </section>
    </main>
  </body>
</html>