---
layout: default
title: Blog
---

<ul>
  {% for entry in site.entries %}
    <li>
      <a href="{{ site.baseurl }}{{ entry.url }}">{{ entry.title }}</a>
    </li>
  {% endfor %}
</ul>
