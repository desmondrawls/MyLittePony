class Mlp.Views.Shopping extends Backbone.View
  template: JST['shopping/shopping']
  className: 'container'
  id: 'fitting-room'

  events:
    'click .clothing-list-item': 'clickedClothing'

  render: =>
    console.log("going shopping...")
    $(@el).html(@template())
    this

  clickedClothing: (event) ->
    console.log("clothing clicked look out for updates...")
    clothing_dept = event.currentTarget.id.split("-")[0]
    clothing_id = event.currentTarget.id.split("-")[1]
    Mlp.vent.trigger('clothing_item:clicked', clothing_dept, clothing_id)
