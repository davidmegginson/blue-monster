<?php

/**
 * Controller to select a tag as a filter.
 */
class FilterController extends AbstractController {

  function doGET(HttpRequest $request, HttpResponse $response) {

    $params->filter_tag = $request->get('filter_tag'); // tag on which to filter
    $params->tag = $request->get('tag'); // tag being viewed
    $params->dataset = $request->get('dataset');
    $params->import = $request->get('import');

    $import = get_import($params->dataset, $params->import);

    list($filter_fragment, $filters) = process_filters($request, $import->import, get_tags());

    $options = do_query(
      'select value, count(distinct row) as count' .
      ' from value_view' .
      ' where tag=? and row in ' . $filter_fragment .
      ' group by value' .
      ' order by value',
      $params->filter_tag
    );

    $response->setParameter('params', $params);
    $response->setParameter('filters', $filters);
    $response->setParameter('import', $import);
    $response->setParameter('options', $options);
    $response->setTemplate('filter');
  }

}