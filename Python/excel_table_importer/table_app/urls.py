from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('create-table/', views.create_table, name='create_table'),
    path('table/<int:table_id>/add-columns/', views.add_columns, name='add_columns'),
    path('column/<int:column_id>/delete/', views.delete_column, name='delete_column'),
    path('table/<int:table_id>/manage-data/', views.manage_data, name='manage_data'),
    path('import/<int:import_id>/map-headers/', views.save_header_mapping, name='save_header_mapping'),
    path('table/<int:table_id>/view-data/', views.view_data, name='view_data'),
    path('table/<int:table_id>/delete/', views.delete_table, name='delete_table'),
]
