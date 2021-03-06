<!DOCTYPE html>

<html>
  <head>
    <title>#{$tag->tag|escape}</title>
{include file="fragments/metadata.tpl"}
  </head>
  <body>
{include file="fragments/header.tpl"}
    <nav class="breadcrumbs">
      <li><a href="http://hxlstandard.org">HXL home</a></li>
      <li><a href="/">Demo</a></li>
      <li><a href="/tag">HXL tags</a></li>
    </nav>

    <main>
      <h1><code>#{$tag->tag|escape}</code> &mdash; <i>{$tag->tag_name|escape}</i></h1>

      <p>This page contains an overview of a specific HXL tag
      (<code>#{$tag->tag|escape}</code>), along with basic
      documentation and a list of the datasets in the showcase that
      currently use the tag.</p>

      <p><b>Data type:</b> {$tag->datatype_name|escape}</p>

      <section id="datasets">
        <h2>Datasets</h2>

        {if $dataset_count > 0}
        <p>{$dataset_count|escape} dataset(s) use the HXL tag <code>#{$tag->tag|escape}</code>:</p>

        <table>
          <thead>
            <tr>
              <th>Dataset</th>
              <th>Source</th>
              <th>Imported by</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
            {foreach item=import from=$imports}
            <tr>
              <td><a href="{$import|dataset_link}">{$import->dataset_name|escape}</a></td>
              <td><a href="{$import|source_link}">{$import->source_name|escape}</a></td>
              <td><a href="{$import|user_link}">{$import->usr_name|escape}</a></td>
              <td><a href="{$import|import_link}">{$import->stamp|timeAgo}</a></td>
            </tr>
            {/foreach}      
          </tbody>
        </table>
        {else}
        <p>No datasets use the HXL tag &ldquo;{$tag->tag|escape}&rdquo; yet.</p>
        {/if}

      </section>
    </main>
  </body>
</html>