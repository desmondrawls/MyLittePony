class Mlp.Collections.Settings extends Backbone.Collection
  url: '/api/settings'
  model: Mlp.Models.Setting

  randomSetting: ->
    selected = @shuffle()[0]
    console.log(selected)
    selected.select() if selected

  randomReset: ->
    for model in this.models
      model.deselect()

  navigate: (previous, direction) ->
    console.log("navigating...")
    next = this.where id: previous.get("#{direction}")
    console.log("im about to deselect")
    previous.deselect()
    console.log("i just deselected")
    next[0].select()
    next[0]

  selected: ->
    selected = this.where selected: true
    selected[0]
  
  assign_cameos: (ponies) ->
    console.log("assigning cameos...")
    console.log(ponies.models)
    shuffled_collection = @shuffle()
    console.log("SHUFFLED:", shuffled_collection)
    for pony, index in ponies.models
      setting = shuffled_collection[index]
      setting.set(pony_id: pony.get('id'))
      setting.save()
      console.log("saved #{index}")

  reset_cameos: ->
    console.log("resetting cameos...")
    for model in this.models
      model.set(pony_id: null)