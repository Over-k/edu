# table_app/templatetags/__init__.py
# Empty file to make the directory a Python package

# table_app/templatetags/table_filters.py
from django import template

register = template.Library()

@register.filter
def get_item(dictionary, key):
    """Custom filter to get an item from a dictionary by key."""
    return dictionary.get(key)