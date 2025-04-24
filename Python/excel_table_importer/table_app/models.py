from django.db import models
import json


class TableStructure(models.Model):
    """Stores the structure of a custom table created by a user."""
    name = models.CharField(max_length=100)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    
    def __str__(self):
        return self.name


class TableColumn(models.Model):
    """Represents a column in a custom table."""
    TYPE_CHOICES = [
        ('text', 'Text'),
        ('number', 'Number'),
        ('date', 'Date'),
        ('boolean', 'Boolean'),
    ]
    
    table = models.ForeignKey(TableStructure, on_delete=models.CASCADE, related_name='columns')
    name = models.CharField(max_length=100)
    data_type = models.CharField(max_length=20, choices=TYPE_CHOICES)
    order = models.IntegerField(default=0)
    
    def __str__(self):
        return f"{self.table.name} - {self.name} ({self.data_type})"
    
    class Meta:
        ordering = ['order']


class TableData(models.Model):
    """Stores the actual data for a table."""
    table = models.ForeignKey(TableStructure, on_delete=models.CASCADE, related_name='data')
    created_at = models.DateTimeField(auto_now_add=True)
    
    def __str__(self):
        return f"Data for {self.table.name} (ID: {self.id})"


class TableCell(models.Model):
    """Represents a single cell of data in a table."""
    row = models.ForeignKey(TableData, on_delete=models.CASCADE, related_name='cells')
    column = models.ForeignKey(TableColumn, on_delete=models.CASCADE)
    text_value = models.TextField(null=True, blank=True)
    number_value = models.FloatField(null=True, blank=True)
    date_value = models.DateField(null=True, blank=True)
    boolean_value = models.BooleanField(null=True, blank=True)
    
    def get_value(self):
        """Returns the value based on the column's data type."""
        data_type = self.column.data_type
        if data_type == 'text':
            return self.text_value
        elif data_type == 'number':
            return self.number_value
        elif data_type == 'date':
            return self.date_value
        elif data_type == 'boolean':
            return self.boolean_value
        return None
    
    def set_value(self, value):
        """Sets the value based on the column's data type."""
        data_type = self.column.data_type
        if data_type == 'text':
            self.text_value = str(value) if value is not None else None
        elif data_type == 'number':
            try:
                self.number_value = float(value) if value is not None else None
            except (ValueError, TypeError):
                self.number_value = None
        elif data_type == 'date':
            self.date_value = value
        elif data_type == 'boolean':
            if isinstance(value, str):
                self.boolean_value = value.lower() in ('true', 'yes', '1')
            else:
                self.boolean_value = bool(value) if value is not None else None
    
    def __str__(self):
        return f"{self.column.name}: {self.get_value()}"


class ExcelImport(models.Model):
    """Tracks excel imports."""
    table = models.ForeignKey(TableStructure, on_delete=models.CASCADE)
    file = models.FileField(upload_to='uploads/')
    imported_at = models.DateTimeField(auto_now_add=True)
    header_mapping = models.TextField(blank=True)  # JSON string mapping Excel headers to table columns
    
    def get_header_mapping(self):
        """Returns the header mapping as a dictionary."""
        if not self.header_mapping:
            return {}
        return json.loads(self.header_mapping)
    
    def set_header_mapping(self, mapping_dict):
        """Sets the header mapping from a dictionary."""
        self.header_mapping = json.dumps(mapping_dict)
    
    def __str__(self):
        return f"Import for {self.table.name} at {self.imported_at}"